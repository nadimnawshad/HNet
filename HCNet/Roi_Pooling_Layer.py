import tensorflow as tf
import tensorflow.keras.backend as K
from tensorflow.keras.layers import Layer

class RoiPoolingConv(Layer):
    """Expanded ROI pooling layer for 2D inputs.
    
    The layer brings all ROIs to the same size, with additional functionality for edge cases, padding strategies,
    and pooling methods. This layer is essential in models handling object detection tasks such as HCNet.
    """
    def __init__(self, pool_size, num_rois, pooling_type='max', padding_type='valid', **kwargs):
        self.pool_size = pool_size
        self.num_rois = num_rois
        self.pooling_type = pooling_type  # Option to choose between 'max' and 'avg' pooling
        self.padding_type = padding_type  # Choose padding type: 'valid' or 'same'
        super(RoiPoolingConv, self).__init__(**kwargs)

    def build(self, input_shape):
        """Initialize the parameters based on input shape."""
        self.nb_channels = input_shape[0][3]  # Number of channels

    def compute_output_shape(self, input_shape):
        """Compute the output shape based on the number of ROIs and pool size."""
        return None, self.num_rois, self.pool_size, self.pool_size, self.nb_channels

    def call(self, x, mask=None):
        """Apply pooling on the selected ROIs from the input image."""
        img = x[0]
        rois = x[1]
        input_shape = K.shape(img)
        outputs = []

        for roi_idx in range(self.num_rois):
            x = rois[roi_idx, 0]
            y = rois[roi_idx, 1]
            w = rois[roi_idx, 2]
            h = rois[roi_idx, 3]

            x1 = K.cast(x, 'int32')
            y1 = K.cast(y, 'int32')
            x2 = K.cast(x + w, 'int32')
            y2 = K.cast(y + h, 'int32')

            # Ensure coordinates do not exceed image boundaries
            x1 = K.maximum(0, x1)
            y1 = K.maximum(0, y1)
            x2 = K.minimum(input_shape[1], x2)
            y2 = K.minimum(input_shape[2], y2)

            # Crop the region of interest from the image
            x_crop = img[:, y1:y2, x1:x2, :]

            # Apply padding if necessary
            if self.padding_type == 'same':
                x_crop = tf.image.resize_with_pad(x_crop, self.pool_size, self.pool_size)

            # Choose pooling type (max or average)
            if self.pooling_type == 'max':
                pooled_val = K.max(x_crop, axis=(1, 2))
            else:
                pooled_val = K.mean(x_crop, axis=(1, 2))

            outputs.append(pooled_val)

        # Concatenate and reshape all pooled ROIs
        final_output = K.concatenate(outputs, axis=0)
        final_output = K.reshape(final_output, (1, self.num_rois, self.pool_size, self.pool_size, self.nb_channels))
        return final_output
