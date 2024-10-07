import yfinance as yf
stock_data = yf.download('VDY', start='2014-02-21', end='2024-09-21')
stock_data
from sklearn.preprocessing import MinMaxScaler

scaler = MinMaxScaler(feature_range=(0,1))

scaledData = scaler.fit_transform(stock_data['Close'].values.reshape(-1, 1))

import numpy as np

def create_dataset(data, time_step):
    x, y = [], []
    for i in range(len(data) - time_step - 1):
        x.append(data[i:(i+time_step), 0]) # x is all the values leading up to the y value 
        y.append(data[i + time_step, 0]) # just the y value
    return np.array(x), np.array(y)

time_step = 100
x, y = create_dataset(scaledData, time_step)

# create train and testing set
train_size = 0.8
test_size = 0.8

x_train, x_test = x[:int(x.shape[0]*train_size)], x[:int(x.shape[0]*test_size)]
y_train, y_test = y[:int(y.shape[0]*train_size)], y[:int(y.shape[0]*test_size)]

from keras.models import Sequential
from keras.layers import Dense, LSTM

model = Sequential() #
model.add(LSTM(100, return_sequences=True, input_shape=(time_step, 1))) #add 64 neurons
model.add(LSTM(100))
model.add(Dense(100))
model.add(Dense(1)) # 1 neuron for one output

model.compile(optimizer="adam", loss="mean_squared_error") # optimizer is the model doing gradient decent
model.fit(x_train, y_train, epochs=10, batch_size=64)# batch size is how many items we put into thte data at a time epochs ittereations

test_loss = model.evaluate(x_test, y_test)
#test_loss

predictions = model.predict(x_test)
predictions = scaler.inverse_transform(predictions)

original_data = stock_data['Close'].values
predicted_data = np.empty_like(original_data)
predicted_data[:] = np.nan
predicted_data[-len(predictions):] = predictions.reshape(-1)

import matplotlib.pyplot as plt

plt.plot(original_data, label='Original Data')
plt.plot(predicted_data, label='Predicted Data')
plt.legend()
plt.show()

new_predictions = model.predict(x_test[-90:])
new_predictions = scaler.inverse_transform(new_predictions)

predicted_data = np.append(predicted_data, new_predictions)
predicted_data[-90:]

plt.plot(original_data, label='Original Data')
plt.plot(predicted_data, label='Predicted Data')
plt.legend()
plt.show()