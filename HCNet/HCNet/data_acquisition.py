import os
import cv2
import numpy as np

def load_images_from_folder(folder):
    """Load images from a directory."""
    images = []
    for filename in os.listdir(folder):
        img = cv2.imread(os.path.join(folder, filename))
        if img is not None:
            images.append(img)
    return images
