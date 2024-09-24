from tensorflow.keras.callbacks import ModelCheckpoint, ReduceLROnPlateau, EarlyStopping, LearningRateScheduler
import numpy as np

def lr_schedule(epoch):
    """Advanced Learning Rate Scheduling based on epoch number for gradual decrease in learning rate."""
    if epoch < 10:
        return 1e-3  # Initial learning rate
    elif 10 <= epoch < 30:
        return 1e-4
    elif 30 <= epoch < 50:
        return 1e-5
    else:
        return 1e-6  # Very small learning rate after 50 epochs

def train_with_advanced_callbacks(model, train_images, train_labels, val_images, val_labels):
    """Train the HCNet model with a more advanced learning rate scheduler, additional early stopping, and checkpointing."""
    
    # Learning rate scheduler
    lr_scheduler = LearningRateScheduler(lr_schedule)
    
    # Callback to save the best model
    checkpoint = ModelCheckpoint('best_model_advanced.h5', monitor='val_loss', save_best_only=True, verbose=1)
    
    # Reduce the learning rate if validation loss plateaus
    reduce_lr = ReduceLROnPlateau(monitor='val_loss', factor=0.2, patience=5, min_lr=1e-6, verbose=1)
    
    # Stop training if no improvement for 10 epochs
    early_stop = EarlyStopping(monitor='val_loss', patience=10, restore_best_weights=True, verbose=1)

    # Train the model with advanced callbacks and learning rate scheduling
    history = model.fit(
        train_images, train_labels,
        validation_data=(val_images, val_labels),
        epochs=100,
        batch_size=32,
        callbacks=[checkpoint, reduce_lr, early_stop, lr_scheduler],
        verbose=1
    )

    return history
