import { todoModule } from "./todo";

export function architecture() {
  const task1 = todoModule.createTask(
    "Research local building codes",
    " Spend time reviewing the local building codes and regulations for a new project you'll be working on."
  );
  const task2 = todoModule.createTask(
    "Create preliminary design sketches",
    "Using the information gathered from the client meeting, create preliminary design sketches for a new commercial building."
  );
  const task3 = todoModule.createTask(
    "Meet with clients to discuss project goals",
    "Schedule and conduct a meeting with clients to discuss their goals and preferences for a new commercial building."
  );
  const task4 = todoModule.createTask(
    "Develop detailed construction plans",
    "Work with engineers and contractors to develop detailed construction plans for the commercial building project."
  );
  const task5 = todoModule.createTask(
    "Present final design plans to clients",
    "Present the final design plans to the clients, incorporating any feedback or changes requested during previous meetings."
  );
  const task6 = todoModule.createTask(
    "Oversee construction process",
    "Monitor the construction process, ensuring that the plans and specifications are being followed and addressing any issues that arise."
  );

  todoModule.addToTodo(task1);
  todoModule.addToTodo(task2);
  todoModule.addToDoing(task3);
  todoModule.addToDoing(task4);
  todoModule.addToDone(task5);
  todoModule.addToDone(task6);
}

export function morningRoutine() {
  const task1 = todoModule.createTask(
    "Pack work bag and leave for the office",
    ""
  );
  const task2 = todoModule.createTask("Get dressed for work", "");
  const task3 = todoModule.createTask("Eat breakfast", "");
  const task4 = todoModule.createTask("Prepare breakfast", "");
  const task5 = todoModule.createTask("Drink a glass of water", "");
  const task6 = todoModule.createTask("Brush teeth and wash face", "");
  const task7 = todoModule.createTask("Wake up at 6:00 AM", "");

  todoModule.addToTodo(task1);
  todoModule.addToTodo(task2);
  todoModule.addToTodo(task3);

  todoModule.addToDoing(task4);
  todoModule.addToDoing(task5);
  todoModule.addToDoing(task6);

  todoModule.addToDone(task7);
}

export function schoolSubjects() {
  const task2 = todoModule.createTask(
    "Math homework",
    " Complete the exercises on page 56 of the textbook"
  );
  const task3 = todoModule.createTask(
    "Science project",
    "Research and gather information about the water cycle"
  );
  const task4 = todoModule.createTask(
    "History reading",
    "Read chapter 3 in the textbook and take notes"
  );
  const task5 = todoModule.createTask(
    "English essay",
    'Write a 3-page essay on the theme of friendship in "To Kill a Mockingbird"'
  );
  const task6 = todoModule.createTask(
    "Spanish vocabulary",
    "Review and memorize vocabulary words for the upcoming quiz"
  );
  const task7 = todoModule.createTask(
    "Music practice",
    "Practice playing the piano for 30 minutes"
  );

  const task8 = todoModule.createTask(
    "Physical Education",
    "Attend the gym class and complete the assigned workout"
  );

  todoModule.addToTodo(task2);
  todoModule.addToTodo(task3);

  todoModule.addToDoing(task4);
  todoModule.addToDoing(task5);
  todoModule.addToDoing(task6);

  todoModule.addToDone(task7);
  todoModule.addToDone(task8);
}

export function photography() {
  const task1 = todoModule.createTask(
    "Choose a subject or theme",
    "Brainstorm ideas and select a subject or theme to focus on for your photography session"
  );
  const task2 = todoModule.createTask(
    "Gather equipment",
    "Ensure you have the necessary equipment such as camera, lenses, tripod, and lighting equipment"
  );
  const task3 = todoModule.createTask(
    "Scout locations",
    "Scout potential locations for your photography session, taking into account lighting and scenery"
  );
  const task4 = todoModule.createTask(
    "Take photos",
    "Experiment with angles and lighting while taking photos to capture the desired effect"
  );
  const task5 = todoModule.createTask(
    "Edit photos",
    "Use photo editing software to enhance and refine your photos"
  );
  const task6 = todoModule.createTask(
    "Print or publish photos",
    "Display your photos by printing them or publishing them on a platform such as Instagram or a personal website"
  );

  todoModule.addToTodo(task1);
  todoModule.addToTodo(task2);

  todoModule.addToDoing(task4);
  todoModule.addToDoing(task5);

  todoModule.addToDone(task3);
  todoModule.addToDone(task6);
}





// Arts and Design
// -Photography

// -Graphic Design

// -Fashion Design

// -Drawing

// -Interior Design

// Academics

// -Writing a Research Paper

// -Studying for an Exam

// -Writing a Book Review

// -Giving a Presentation

// -Applying to Graduate School

// Architecture and Engineering

// -Designing a Building

// -Conducting Structural Analysis

// -Creating a 3D Model

// -Conducting Energy Analysis

// -Creating Technical Drawings

//  Information Technology

// -Developing a Software Application

// -Implementing a Network Infrastructure

// -Conducting a Security Assessment

// -Creating a Database System

// -Designing a User Interface

// Personal

// -Starting a Daily Exercise Routine

// -Learning a New Language

// -Starting a Personal Blog

// -Planning a Trip

// -Starting a Gratitude Practice
