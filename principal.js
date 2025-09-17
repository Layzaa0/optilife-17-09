// Exemplo: mudar automaticamente de slide a cada 4 segundos
const meuCarrossel = document.querySelector('#meuCarrossel');
const carrossel = new bootstrap.Carousel(meuCarrossel, {
    interval: 5000,
    ride: 'carousel'
});
