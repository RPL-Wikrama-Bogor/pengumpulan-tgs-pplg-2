def tambahHippo():
    Hippos = 0
    answer = 'y'
    while answer == 'y':
        Hippos = Hippos + 1
        print('Ada {} Hippos'.format(Hippos))
        answer = input('Tamba ta? (y/n)')

print('MULAI!!!')
tambahHippo()
print('SELESAI!!!')