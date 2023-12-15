const mostRecentScore = localStorage.getItem('mostRecentScore');

const resultTitle = document.getElementById("resultTitle");
const resultHeader = document.getElementById("sub-header");
const resultHeaderContent = document.getElementById("sub-header-content");
const finalScore = document.getElementById("finalScore");
if (mostRecentScore >= 0 && mostRecentScore <= 20) {
    finalScore.style.color ="#A31818";
    resultTitle.innerText = "Try Again";
    resultHeader.innerText = "Learn from this mistakes and try again";
    resultHeaderContent.innerText = "Congratulations on giving it your best, even in the face of challenges. Learn from this, and I'm confident you'll do even better next time. Keep going";
    resultImage.src = "../../assets/img/scorelow.png";
} else if (mostRecentScore >= 30 && mostRecentScore <= 40) {
    finalScore.style.color ="#CA9716";
    resultTitle.innerText = "Well Done";
    resultHeader.innerText = "Learn from this mistakes and try again";
    resultHeaderContent.innerText = "Congratulations on giving it your best, even in the face of challenges. Learn from this, and I'm confident you'll do even better next time. Keep going";
    resultImage.src = "../../assets/img/scoremedium.png";
} else if (mostRecentScore == 50) {
    finalScore.style.color ="#7EE100";
    resultTitle.innerText = "CONGRATULATIONS!";
    resultHeader.innerText = "Learn from this mistakes and try again";
    resultHeaderContent.innerText = "Congratulations on giving it your best, even in the face of challenges. Learn from this, and I'm confident you'll do even better next time. Keep going";
    resultImage.src = "../../assets/img/scorehigh.png";
} else {
    resultTitle.innerText = "Error";
}

finalScore.innerText = "Score\n" + mostRecentScore;