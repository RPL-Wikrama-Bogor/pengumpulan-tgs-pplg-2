# -*- coding: utf-8 -*-
"""Untitled0.ipynb

Automatically generated by Colaboratory.

Original file is located at
    https://colab.research.google.com/drive/1QG3ed_od5rgZE_fEZ2XNhA-mUtx8ss88
"""

x = 5
print(type(x))

y= 8.5
print(type(y))

mobil = "hijau"
print(type(mobil))

for i in range(1, 11, 2):
    print(i, end=" ")

username = ''
password = 'pertamina'
kesempatan = 1

while (kesempatan < 2):
    username_user = input('masukkan username : ')
    password_user = input('masukkan password : ')

    if (username == username_user and password == password_user):
        print('berhasil')
        break

def tambahHippo():
  Hippo = 0
  answer= 'y'
  while answer == 'y':
    Hippos = Hippos + 1
    print('Ada {} Hippos' , format(Hippos))
    answer = input('Tambah Gak? (y/n)')

    print('mulai!!!')
    tambahHippo()
    print('selesai!!!')