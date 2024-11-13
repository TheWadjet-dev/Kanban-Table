let visitCount = localStorage.getItem('visitCount');
if (!visitCount) {
    visitCount = '0';
}

visitCount = (parseInt(visitCount) + 1).toString();

localStorage.setItem('visitCount', visitCount);

const visitCountElement = document.getElementById('visit-count');
if (visitCountElement) {
    visitCountElement.textContent = visitCount;
}
