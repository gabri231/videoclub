var tituloPaginaActual = document.title;
window.addEventListener('blur', function() {
  document.title = ':( vuelve por favor :('
});
window.addEventListener('focus', function() {
  document.title = tituloPaginaActual;
});