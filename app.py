#!C:\xampp\htdocs\hhgg\venv\Scripts\python.exe

# load best model
import sys
import numpy as np
import pandas as pd
from keras_preprocessing.image import img_to_array, load_img
from keras.applications.vgg19 import preprocess_input
from keras.models import load_model

var1 = sys.argv[1]  # first parameter
var2 = sys.argv[2]  # second parameter
var3 = sys.argv[3]  # third parameter

model = load_model("best_model.h5")
disease_info = pd.read_csv('disease_info.csv', encoding='cp1252')


def prediction(path1, path2, path3):
    path1 = 'C:/xampp/htdocs/hhgg/disease_images/' + path1
    path2 = 'C:/xampp/htdocs/hhgg/disease_images/' + path2
    path3 = 'C:/xampp/htdocs/hhgg/disease_images/' + path3

    img1 = load_img(path1, target_size=(256, 256))
    i1 = img_to_array(img1)
    im1 = preprocess_input(i1)
    img1 = np.expand_dims(im1, axis=0)
    pred1 = np.argmax(model.predict(img1))

    img2 = load_img(path2, target_size=(256, 256))
    i2 = img_to_array(img2)
    im2 = preprocess_input(i2)
    img2 = np.expand_dims(im2, axis=0)
    pred2 = np.argmax(model.predict(img2))

    img3 = load_img(path3, target_size=(256, 256))
    i3 = img_to_array(img3)
    im3 = preprocess_input(i3)
    img3 = np.expand_dims(im3, axis=0)
    pred3 = np.argmax(model.predict(img3))

    if (pred1 == pred2) or (pred1 == pred3):
        pred = pred1
        title = disease_info['disease_name'][pred]
        description = disease_info['description'][pred]
        supplement_name = disease_info['supplement_name'][pred]
        possible_steps = disease_info['possible_steps'][pred]
        print(f" ||{title}||{description}||{supplement_name}||{possible_steps}")

    elif pred2 == pred3:
        pred = pred2
        title = disease_info['disease_name'][pred]
        description = disease_info['description'][pred]
        supplement_name = disease_info['supplement_name'][pred]
        possible_steps = disease_info['possible_steps'][pred]
        print(f" ||{title}||{description}||{supplement_name}||{possible_steps}")
    else:
        print(f" || || || || ")


prediction(var1, var2, var3)
