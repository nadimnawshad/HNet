from tensorflow.keras.layers import Conv2D, MaxPooling2D, Dropout, BatchNormalization, Activation, SeparableConv2D

def custom_base_layers(inputs):
    """Expanding the base layers with separable convolutions, deeper layers, and advanced dropout strategies."""
    
    # First Convolutional Block
    x = Conv2D(64, (3, 3), padding='same')(inputs)
    x = BatchNormalization()(x)  # Normalization after each convolution layer
    x = Activation('relu')(x)
    x = SeparableConv2D(64, (3, 3), padding='same')(x)  # Replacing with separable convolutions for efficiency
    x = BatchNormalization()(x)
    x = Activation('relu')(x)
    x = MaxPooling2D((2, 2))(x)  # Pooling Layer
    x = Dropout(0.3)(x)  # Dropout for regularization

    # Second Convolutional Block
    x = Conv2D(128, (3, 3), padding='same')(x)
    x = BatchNormalization()(x)
    x = Activation('relu')(x)
    x = Conv2D(128, (3, 3), padding='same')(x)
    x = BatchNormalization()(x)
    x = Activation('relu')(x)
    x = MaxPooling2D((2, 2))(x)
    x = Dropout(0.4)(x)  # Increase dropout for deeper layers
    
    # Third Convolutional Block
    x = SeparableConv2D(256, (3, 3), padding='same')(x)
    x = BatchNormalization()(x)
    x = Activation('relu')(x)
    x = SeparableConv2D(256, (3, 3), padding='same')(x)
    x = BatchNormalization()(x)
    x = Activation('relu')(x)
    x = Dropout(0.4)(x)  # Additional dropout
    x = SeparableConv2D(256, (3, 3), padding='same')(x)
    x = BatchNormalization()(x)
    x = Activation('relu')(x)
    x = MaxPooling2D((2, 2))(x)

    # Fourth Convolutional Block (Deeper)
    x = Conv2D(512, (3, 3), padding='same')(x)
    x = BatchNormalization()(x)
    x = Activation('relu')(x)
    x = Conv2D(512, (3, 3), padding='same')(x)
    x = BatchNormalization()(x)
    x = Activation('relu')(x)
    x = Dropout(0.5)(x)  # Heavier dropout for more regularization
    x = MaxPooling2D((2, 2))(x)

    return x
