import sys
import os
import cv2
import numpy as np
import pickle
from mtcnn import MTCNN
from deepface import DeepFace

# ========== CONFIG ==========
BASE_DIR = os.path.dirname(os.path.abspath(__file__))
MODEL_DIR = os.path.join(BASE_DIR, "face_models_facenet")

SVM_PATH = os.path.join(MODEL_DIR, "svm_facenet.pkl")
ENCODER_PATH = os.path.join(MODEL_DIR, "label_encoder_facenet.pkl")

THRESHOLD = 0.45

# ========== INPUT ==========
image_path = sys.argv[1]

# ========== LOAD MODELS ==========
with open(SVM_PATH, "rb") as f:
    svm = pickle.load(f)

with open(ENCODER_PATH, "rb") as f:
    encoder = pickle.load(f)

detector = MTCNN()
DeepFace.build_model("Facenet")

def l2(v):
    v = np.array(v)
    return v / np.linalg.norm(v)

# ========== READ IMAGE ==========
img = cv2.imread(image_path)
if img is None:
    print("fail", flush=True)
    sys.exit(0)

rgb = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
faces = detector.detect_faces(rgb)

# ========== VERIFY ==========
for f in faces:
    x, y, w, h = f['box']
    x, y = max(0, x), max(0, y)
    face = rgb[y:y+h, x:x+w]

    if face.size == 0:
        continue

    rep = DeepFace.represent(
        img_path=face,
        model_name="Facenet",
        enforce_detection=False
    )

    emb = l2(rep[0]['embedding'])
    probs = svm.predict_proba([emb])[0]
    idx = np.argmax(probs)
    name = encoder.inverse_transform([idx])[0]

    if name == "admin" and probs[idx] >= THRESHOLD:
        print("admin", flush=True)
        sys.exit(0)

print("fail", flush=True)
sys.exit(0)
