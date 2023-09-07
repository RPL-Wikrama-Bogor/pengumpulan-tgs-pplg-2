username = 'universitas'
password = 'pertamina'
kesempatan = 1

while(kesempatan < 2):
    username_user = input('masukkan username: ')
    password_user = input('masukkan password: ')

    if(username == username_user and password == password_user):
        print('Login berhasil')
        break
    else:
        kesempatan -= 1
        print('kesempatan tersisa {} kali lagi'.format(kesempatan))