class Question {
    constructor(text, choices, answer) {
      this.text = text;
      this.choices = choices;
      this.answer = answer;
    }
    isCorrectAnswer(choice) {
      return this.answer === choice;
    }
  }
  let questions = [
    new Question("Which house in Belval hosts the main research activities in the scientific, technological and medical disciplines ?", ["Maison du Nombre", "Maison du Savoir", "Maison des Arts et des Étudiants", "Maison de l’Innovation"], "Maison du Savoir"),
    new Question("Which research center in Belval focuses its research on environmental, digital and material science fields ?", ["Luxembourg Institute of Science and Technology (LIST)","Luxembourg Institute of Socio-Economic Research (LISER)", "Luxembourg Institute for quality assurance (ILNAS)", "Luxembourg Centre for Systems Biomedicine (LCBS)"], "Luxembourg Institute of Science and Technology (LIST)"),
    new Question("What event in Belval is an opportunity for scientists to present their work and research projects to a wide audience ?", ["Researches’ Days à la Rockhal","BiCS Challenge Belval", "Cycling4Health", "SONIC VISIONS 2018"], "Researches’ Days à la Rockhal"),
    new Question("The Belval campus is particularly attractive to research institutes and companies related to research, for example in the areas of: ", ["Economy and finance", "Biomedicine and Computer Science","Geography and Spatial Planning", "Engineering and Physics"], "Biomedicine and Computer Science"),
    new Question("What major project is currently under development in the Faculty of Science, Technology and Medicine ?", ["TRANSCEND", "ANKP", "HANDB", "KIMM-LUX"],"TRANSCEND")
  ];
  
  
  console.log(questions);
  
  class Quiz {
    constructor(questions) {
      this.score = 0;
      this.questions = questions;
      this.currentQuestionIndex = 0;
    }
    getCurrentQuestion() {
      return this.questions[this.currentQuestionIndex];
    }
    guess(answer) {
      if (this.getCurrentQuestion().isCorrectAnswer(answer)) {
        this.score++;
      }
      this.currentQuestionIndex++;
    }
    hasEnded() {
      return this.currentQuestionIndex >= this.questions.length;
    }
  }
  
  // Regroup all  functions relative to the App Display
  const display = {
    elementShown: function(id, text) {
      let element = document.getElementById(id);
      element.innerHTML = text;
    },
    endQuiz: function() {
      endQuizHTML = `
        <h1>Quiz finished !</h1>
        <h3> Your score : ${quiz.score} / ${quiz.questions.length}</h3>`;
      this.elementShown("quiz", endQuizHTML);
    },
    question: function() {
      this.elementShown("question", quiz.getCurrentQuestion().text);
    },
    choices: function() {
      let choices = quiz.getCurrentQuestion().choices;
  
      guessHandler = (id, guess) => {
        document.getElementById(id).onclick = function() {
          quiz.guess(guess);
          quizApp();
        }
      }
      // display choices and handle guess
      for(let i = 0; i < choices.length; i++) {
        this.elementShown("choice" + i, choices[i]);
        guessHandler("guess" + i, choices[i]);
      }
    },
    progress: function() {
      let currentQuestionNumber = quiz.currentQuestionIndex + 1;
      this.elementShown("progress", "Question " + currentQuestionNumber + " over " + quiz.questions.length);
    },
  };
  
  // Game logic
  quizApp = () => {
    if (quiz.hasEnded()) {
      display.endQuiz();
    } else {
      display.question();
      display.choices();
      display.progress();
    } 
  }
  // Create Quiz
  let quiz = new Quiz(questions);
  quizApp();
  
  console.log(quiz);
