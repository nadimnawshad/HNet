# Define input shape and parameters
input_shape = (600, 600, 3)  # Assuming input images are 600x600 with 3 channels (RGB)
num_rois = 32  # Number of Regions of Interest (ROIs)
num_classes = 27  # Number of classes for classification

# Instantiate the model with the defined input shape, ROIs, and number of classes
model = HCNet_27_classes(input_shape=input_shape, num_rois=num_rois, num_classes=num_classes)

# Print the model summary to verify the architecture
model.summary()

# Example dummy data for training and validation
import numpy as np

# Creating dummy image data (100 samples for training and 20 for validation)
train_images = np.random.rand(100, 600, 600, 3)  # 100 training images of shape (600, 600, 3)
train_labels = np.random.randint(0, num_classes, size=(100, num_classes))  # One-hot encoded labels

val_images = np.random.rand(20, 600, 600, 3)  # 20 validation images
val_labels = np.random.randint(0, num_classes, size=(20, num_classes))  # Validation labels

# Example Callbacks: Save best model, Reduce Learning Rate, Early Stopping
from tensorflow.keras.callbacks import ModelCheckpoint, ReduceLROnPlateau, EarlyStopping

checkpoint = ModelCheckpoint('best_hcnet_model.h5', monitor='val_loss', save_best_only=True, verbose=1)
reduce_lr = ReduceLROnPlateau(monitor='val_loss', factor=0.2, patience=5, min_lr=1e-6, verbose=1)
early_stop = EarlyStopping(monitor='val_loss', patience=10, restore_best_weights=True, verbose=1)

# Compile and Train the model
history = model.fit(
    train_images, train_labels,
    validation_data=(val_images, val_labels),
    epochs=50,  # Train for 50 epochs
    batch_size=16,  # Batch size of 16
    callbacks=[checkpoint, reduce_lr, early_stop],  # Callbacks for model optimization
    verbose=1
)

# Example Evaluation: Using validation data
val_loss, val_accuracy = model.evaluate(val_images, val_labels)
print(f"Validation Loss: {val_loss}, Validation Accuracy: {val_accuracy}")

# Example Prediction: Predict on new dummy images
new_images = np.random.rand(10, 600, 600, 3)  # Generate 10 new images for prediction
rois = np.random.rand(10, num_rois, 4)  # Generate random ROIs for prediction

# Get predictions for new images
predictions = model.predict([new_images, rois])

# Convert predictions to class labels
predicted_classes = np.argmax(predictions, axis=-1)
print(f"Predicted Classes: {predicted_classes}")
