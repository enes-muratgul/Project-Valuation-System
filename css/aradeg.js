var juriSayisi = 1;
function updateInputVisibility1() {
    if (juriSayisi === 1) {
        document.getElementById("4_1Deger").style.display = "none";
        document.getElementById("3_1Deger").style.display = "none";
        document.getElementById("2_1Deger").style.display = "none";
        document.getElementById("1_1Deger").style.display = ""; 
        document.getElementById("JuriDeger2").style.display = "none";
        document.getElementById("JuriDeger3").style.display = "none";
        document.getElementById("JuriDeger4").style.display = "none";
        document.getElementById("JuriDeger1").style.display = "";
    } 
    if (juriSayisi === 2) {
        document.getElementById("2_1Deger").style.display = "";
        document.getElementById("1_1Deger").style.display = "none";
        document.getElementById("3_1Deger").style.display = "none";
        document.getElementById("4_1Deger").style.display = "none";

        document.getElementById("JuriDeger2").style.display = "";
        document.getElementById("JuriDeger3").style.display = "none";
        document.getElementById("JuriDeger4").style.display = "none";
        document.getElementById("JuriDeger1").style.display = "none";

    }
    if (juriSayisi === 3) {
        document.getElementById("2_1Deger").style.display = "none";
        document.getElementById("1_1Deger").style.display = "none";
        document.getElementById("3_1Deger").style.display = "";
        document.getElementById("4_1Deger").style.display = "none"; 
        
        document.getElementById("JuriDeger2").style.display = "none";
        document.getElementById("JuriDeger3").style.display = "";
        document.getElementById("JuriDeger4").style.display = "none";
        document.getElementById("JuriDeger1").style.display = "none";
    }
    if (juriSayisi === 4) {
        document.getElementById("2_1Deger").style.display = "none";
        document.getElementById("1_1Deger").style.display = "none";
        document.getElementById("3_1Deger").style.display = "none";
        document.getElementById("4_1Deger").style.display = ""; 
     
        document.getElementById("JuriDeger2").style.display = "none";
        document.getElementById("JuriDeger3").style.display = "none";
        document.getElementById("JuriDeger4").style.display = "";
        document.getElementById("JuriDeger1").style.display = "none";
    }
    var input1Value = parseFloat(document.getElementById("1_1Deger").value);
    var input2Value = parseFloat(document.getElementById("1_2Deger").value);
    var input3Value = parseFloat(document.getElementById("1_3Deger").value);

    if (!isNaN(input1Value) && !isNaN(input2Value) && !isNaN(input3Value)) {
        var average = (input1Value + input2Value + input3Value) / 3;
        document.getElementById("JuriDeger1").value = average.toFixed(2);
    } else {
        document.getElementById("JuriDeger1").value = "";
    }
}

function updateInputVisibilityAndCalculateAverage() {
    updateInputVisibility1();

    var input1Value = parseFloat(document.getElementById("1_1Deger").value);
    var input2Value = parseFloat(document.getElementById("1_2Deger").value);
    var input3Value = parseFloat(document.getElementById("1_3Deger").value);

    if (!isNaN(input1Value) && !isNaN(input2Value) && !isNaN(input3Value)) {
        var average = (input1Value + input2Value + input3Value) / 3;
        document.getElementById("JuriDeger1").value = average.toFixed(2);
    } else {
        document.getElementById("JuriDeger1").value = "";
    }
}

document.getElementById("1_1Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage);
document.getElementById("1_2Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage);
document.getElementById("1_3Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage);

function updateInputVisibility2() {
    if (juriSayisi === 1) {
        document.getElementById("4_2Deger").style.display = "none";
        document.getElementById("3_2Deger").style.display = "none";
        document.getElementById("2_2Deger").style.display = "none";
        document.getElementById("1_2Deger").style.display = ""; 
    } 
    if (juriSayisi === 2) {
        document.getElementById("2_2Deger").style.display = "";
        document.getElementById("1_2Deger").style.display = "none";
        document.getElementById("3_2Deger").style.display = "none";
        document.getElementById("4_2Deger").style.display = "none"; 
    }
    if (juriSayisi === 3) {
        document.getElementById("2_2Deger").style.display = "none";
        document.getElementById("1_2Deger").style.display = "none";
        document.getElementById("3_2Deger").style.display = "";
        document.getElementById("4_2Deger").style.display = "none";
    }
    if (juriSayisi === 4) {
        document.getElementById("2_2Deger").style.display = "none";
        document.getElementById("1_2Deger").style.display = "none";
        document.getElementById("3_2Deger").style.display = "none";
        document.getElementById("4_2Deger").style.display = ""; 
    }
}

function updateInputVisibility3() {
    if (juriSayisi === 1) {
        document.getElementById("4_3Deger").style.display = "none";
        document.getElementById("3_3Deger").style.display = "none";
        document.getElementById("2_3Deger").style.display = "none";
        document.getElementById("1_3Deger").style.display = ""; 
    } 
    if (juriSayisi === 2) {
        document.getElementById("2_3Deger").style.display = "";
        document.getElementById("1_3Deger").style.display = "none";
        document.getElementById("3_3Deger").style.display = "none";
        document.getElementById("4_3Deger").style.display = "none"; 
    }
    if (juriSayisi === 3) {
        document.getElementById("2_3Deger").style.display = "none";
        document.getElementById("1_3Deger").style.display = "none";
        document.getElementById("3_3Deger").style.display = "";
        document.getElementById("4_3Deger").style.display = "none"; 
    }
    if (juriSayisi === 4) {
        document.getElementById("2_3Deger").style.display = "none";
        document.getElementById("1_3Deger").style.display = "none";
        document.getElementById("3_3Deger").style.display = "none";
        document.getElementById("4_3Deger").style.display = ""; 
    }
}

function updateInputVisibility4() {
    if (juriSayisi === 1) {
        document.getElementById("4_3Deger").style.display = "none";
        document.getElementById("3_3Deger").style.display = "none";
        document.getElementById("2_3Deger").style.display = "none";
        document.getElementById("1_3Deger").style.display = ""; 
    } 
    if (juriSayisi === 2) {
        document.getElementById("2_3Deger").style.display = "";
        document.getElementById("1_3Deger").style.display = "none";
        document.getElementById("3_3Deger").style.display = "none";
        document.getElementById("4_3Deger").style.display = "none"; 
    }
    if (juriSayisi === 3) {
        document.getElementById("2_3Deger").style.display = "none";
        document.getElementById("1_3Deger").style.display = "none";
        document.getElementById("3_3Deger").style.display = "";
        document.getElementById("4_3Deger").style.display = "none"; 
    }
    if (juriSayisi === 4) {
        document.getElementById("2_3Deger").style.display = "none";
        document.getElementById("1_3Deger").style.display = "none";
        document.getElementById("3_3Deger").style.display = "none";
        document.getElementById("4_3Deger").style.display = ""; 
    }
}

document.getElementById("left-button").addEventListener("click", function() {
    if (juriSayisi > 1) {
        juriSayisi--;
        document.getElementById("kacinci_juri").innerHTML = juriSayisi + ". Jüri";
        updateInputVisibility1();
        updateInputVisibility2()
        updateInputVisibility3()
        updateInputVisibility4()
    }
});

document.getElementById("right-button").addEventListener("click", function() {
    if (juriSayisi < 4) {
        juriSayisi++;
        document.getElementById("kacinci_juri").innerHTML = juriSayisi + ". Jüri";
        updateInputVisibility1();
        updateInputVisibility2()
        updateInputVisibility3()
        updateInputVisibility4()
    }
});

function updateInputVisibilityAndCalculateAverage2() {
    updateInputVisibility2(); 

    var input1Value = parseFloat(document.getElementById("2_1Deger").value);
    var input2Value = parseFloat(document.getElementById("2_2Deger").value);
    var input3Value = parseFloat(document.getElementById("2_3Deger").value);

    if (!isNaN(input1Value) && !isNaN(input2Value) && !isNaN(input3Value)) {
        var average = (input1Value + input2Value + input3Value) / 3;
        document.getElementById("JuriDeger2").value = average.toFixed(2);
    } else {
        document.getElementById("JuriDeger2").value = "";
    }
}

document.getElementById("2_1Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage2);
document.getElementById("2_2Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage2);
document.getElementById("2_3Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage2);

function updateInputVisibilityAndCalculateAverage3() {
    updateInputVisibility3(); 

    var input1Value = parseFloat(document.getElementById("3_1Deger").value);
    var input2Value = parseFloat(document.getElementById("3_2Deger").value);
    var input3Value = parseFloat(document.getElementById("3_3Deger").value);

    if (!isNaN(input1Value) && !isNaN(input2Value) && !isNaN(input3Value)) {
        var average = (input1Value + input2Value + input3Value) / 3;
        document.getElementById("JuriDeger3").value = average.toFixed(2);
    } else {
        document.getElementById("JuriDeger3").value = "";
    }
}

document.getElementById("3_1Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage3);
document.getElementById("3_2Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage3);
document.getElementById("3_3Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage3);

function updateInputVisibilityAndCalculateAverage4() {
    updateInputVisibility4(); 

    var input1Value = parseFloat(document.getElementById("4_1Deger").value);
    var input2Value = parseFloat(document.getElementById("4_2Deger").value);
    var input3Value = parseFloat(document.getElementById("4_3Deger").value);

    if (!isNaN(input1Value) && !isNaN(input2Value) && !isNaN(input3Value)) {
        var average = (input1Value + input2Value + input3Value) / 3;
        document.getElementById("JuriDeger4").value = average.toFixed(2);
    } else {
        document.getElementById("JuriDeger4").value = "";
    }
}

document.getElementById("4_1Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage4);
document.getElementById("4_2Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage4);
document.getElementById("4_3Deger").addEventListener("input", updateInputVisibilityAndCalculateAverage4);

function calculateAverage() {
    var juri1 = parseFloat(document.getElementById("JuriDeger1").value) || 0;
    var juri2 = parseFloat(document.getElementById("JuriDeger2").value) || 0;
    var juri3 = parseFloat(document.getElementById("JuriDeger3").value) || 0;
    var juri4 = parseFloat(document.getElementById("JuriDeger4").value) || 0;

    var toplam = juri1 + juri2 + juri3 + juri4;
    var ortalama = toplam / 4;

    document.getElementById("juriler_ortalamasi").value = ortalama.toFixed(2);
}

document.querySelectorAll('input[type="text"]').forEach(function(input) {
    input.addEventListener('input', function() {
        calculateAverage();
    });
});

function calculateAverage1() {
    var juri1 = parseFloat(document.getElementById("juriler_ortalamasi").value) || 0;
    var toplam = juri1 * 0.4;
    document.getElementById("ortKriler").value = toplam.toFixed(2);
}

document.querySelectorAll('input[type="text"]').forEach(function(input) {
    input.addEventListener('input', function() {
        calculateAverage1();
    });
});


function confirmAction() {
    var confirmation = confirm("Onaylamak istediğine emin misin?");
    if (confirmation) {
        window.location.href = 'aradeg_not.php';
    }
}
function submitForm(action) {
    var form = document.querySelector('form');
    form.action = action;
    form.submit();
}

function onayla(ogrenci_id) {
    return confirm("Silmek istediğinize emin misiniz?");
}


updateInputVisibility1()
updateInputVisibility2()
updateInputVisibility3()
updateInputVisibility4()
