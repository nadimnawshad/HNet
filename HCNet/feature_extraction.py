import numpy as np

def sliding_window(image, stepSize, windowSize):
    # slide a window across the image
    for y in range(0, image.shape[0], stepSize):
        for x in range(0, image.shape[1], stepSize):
            yield (x, y, image[y:y + windowSize[1], x:x + windowSize[0]])

def extract_features(dataset):
    features = {}
    windowSize = (64, 64)  # Example window size
    stepSize = 32  # Example step size
    for cls, images in dataset.items():
        class_features = []
        for img in images:
            windows = sliding_window(img, stepSize, windowSize)
            # Process each window - here we just collect them
            class_features.extend([win for win in windows])
        features[cls] = class_features
    return features
