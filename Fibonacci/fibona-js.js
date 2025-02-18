function FiboDef(){
    return "Ciag Fibonacciego to ciag liczb, gdzie kazda kolejna liczba jest suma dwoch poprzednich"
}

function FiboPrzyk(){
    return "Np. trzecie miejscie ciagu Fibonacciego to jest rowne 2"
}

function FiboIter() {
    n = document.getElementById("number").value;
    resultElement = document.getElementById("result");
    
    if (n <= 0) {
      resultElement.textContent = "Podaj numer większy od zera.";
      return;
    }

    fibArr = [0, 1];
    for (i = 2; i <= n; i++) {
      fibArr[i] = fibArr[i - 1] + fibArr[i - 2];
    }
    resultElement.textContent = `Dla indeksu ${n} ciągu Fibonacciego iteracyjnie obliczona liczba to ${fibArr[n]}`;
}

function FiboReku2(n) {
    if (n <= 1) {
      return n;
    }
    return FiboReku2(n - 1) + FiboReku2(n - 2);
}

function FiboReku() {
    n = parseInt(document.getElementById("number").value);
    resultElement = document.getElementById("result");

    if (n <= 0) {
      resultElement.textContent = "Podaj numer większy od zera.";
      return;
    }

    fibValue = FiboReku2(n);
    resultElement.textContent = `Dla indeksu ${n} ciągu Fibonacciego rekurencyjnie obliczona liczba to ${fibValue}`;
}

document.getElementById("fiboDef").textContent = FiboDef();
document.getElementById("fiboPrzyk").textContent = FiboPrzyk();
