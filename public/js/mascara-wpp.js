function mascaraCelular(i) {
    var v = i.value;
    v = v.replace(/\D/g, '');
    if (v.length > 15) {
        v = v.substring(0, 13);
    }
    if (v.length > 0 && v.length <= 2) {
        v = '(' + v.substring(0, 2);
    } else if (v.length > 2 && v.length <= 7) {
        v = '(' + v.substring(0, 2) + ') ' + v.substring(2);
    } else if (v.length >= 8 && v.length <= 13) {
        v = '(' + v.substring(0, 2) + ') ' + v.substring(2, 7) + '-' + v.substring(7);
    }
    i.value = v;
  }