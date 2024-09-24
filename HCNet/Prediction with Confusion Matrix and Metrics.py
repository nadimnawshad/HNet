from sklearn.metrics import classification_report, confusion_matrix, precision_score, recall_score, f1_score
import numpy as np

def predict_and_evaluate_advanced(model, test_images, test_labels, class_names, num_rois):
    """Advanced prediction function that includes a confusion matrix, precision, recall, and F1-score."""
    
    # ROI input for each new image
    rois = np.array([[[50, 50, 200, 200]] * num_rois] * len(test_images))

    # Get class predictions
    predictions = model.predict([test_images, rois])

    # Convert predicted probabilities to class labels
    predicted_classes = np.argmax(predictions, axis=-1)
    true_classes = np.argmax(test_labels, axis=-1)

    # Generate a classification report
    print("Classification Report:\n", classification_report(true_classes, predicted_classes, target_names=class_names))
    
    # Confusion Matrix
    conf_matrix = confusion_matrix(true_classes, predicted_classes)
    print("Confusion Matrix:\n", conf_matrix)

    # Additional Metrics
    precision = precision_score(true_classes, predicted_classes, average='weighted')
    recall = recall_score(true_classes, predicted_classes, average='weighted')
    f1 = f1_score(true_classes, predicted_classes, average='weighted')

    print(f"Precision: {precision:.4f}, Recall: {recall:.4f}, F1-score: {f1:.4f}")

    return predicted_classes
