export default (await import('vue')).defineComponent({
data() {
return {
typeInput: 'password',
counterButton: 0,
numberComputed: 0,
show: true,
count: 1,
nama: 'Vlykz',
number: 1,
kelas: '<h1> Kelas 11</h1>',
nonaktif: true,
property: {
id: 1,
class: 'color'
},
type: 'password',
isActive: true
};
},
methods: {
counterNumber() {
this.counterButton += 1;
},
showPassword() {
if (this.typeInput == 'password') {
this.typeInput = 'text';
}
else {
this.typeInput = 'password';
}
}
},
computed: {
countComputed() {
this.numberComputed += 1;
}
},
ubahWarna() {
if (this.isActive) {
this.isActive = false;
}
else {
this.isActive = true;
}
}
});
