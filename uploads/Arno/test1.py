import numpy as np
import scipy.optimize as resol
import scipy.integrate as integr
import matplotlib.pyplot as plt

def f(v, t) :
    return np.array(v[1], -2v[0] - 5v[1])
    
T = np.linspace(0,1,100)
X = integr.odeint(f, np.array([0,1]),T)
plt.plot(T,X[0])
plt.show()