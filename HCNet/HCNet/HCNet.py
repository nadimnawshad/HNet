from tensorflow.keras.layers import Dense, Flatten, Dropout, Input

def HCNet_27_classes(input_shape, num_rois, num_classes=27):
    """An expanded HCNet model to handle 27 classes, including advanced dropout strategies and custom base layers."""
    
    # Input layer
    inputs = Input(shape=input_shape)
    
    # Custom base layers for feature extraction
    base_layers = custom_base_layers(inputs)
    
    # Input for ROI
    rois_input = Input(shape=(num_rois, 4))
    
    # Apply ROI pooling
    pooled_features = RoiPoolingConv(pooling_regions=7, num_rois=num_rois)([base_layers, rois_input])
    
    # Flatten the pooled features
    x = Flatten()(pooled_features)
    
    # Fully connected layers for classification
    x = Dense(4096, activation='relu')(x)
    x = Dropout(0.5)(x)
    x = Dense(4096, activation='relu')(x)
    x = Dropout(0.5)(x)
    
    # Final classification layer for 27 classes
    out_class = Dense(num_classes, activation='softmax')(x)
    
    # Compile the model
    model = Model(inputs=[inputs, rois_input], outputs=out_class)
    model.compile(optimizer=Adam(learning_rate=0.001), loss='categorical_crossentropy', metrics=['accuracy'])

    return model
