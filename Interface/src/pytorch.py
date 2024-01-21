import requests

def reverse_geocode(lat, lon):
    url = f'https://nominatim.openstreetmap.org/reverse?format=json&lat={lat}&lon={lon}'
    response = requests.get(url)
    data = response.json()
    address = data.get('display_name', 'Address not found')
    return address

from flask import Flask, render_template, request, jsonify

app = Flask(__name__)

@app.route('/')
def index():
    message = ""
    return render_template('index.html',message=message)

@app.route('/process_coordinates', methods=['POST'])
def process_coordinates():
    try:
        latitude = request.form.get('latitude')
        longitude = request.form.get('longitude')

        message = reverse_geocode(latitude, longitude)

        return jsonify({'result': message})
    except Exception as e:
        return jsonify({'error': str(e)})

if __name__ == '__main__':
    app.run(debug=True)
