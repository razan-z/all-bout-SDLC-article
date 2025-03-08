<?php
require_once("../../connection/connection.php");
require_once("../../models/User.php");
require_once("../../models/UserSkeleton.php");
require_once("../../models/Question.php");
require_once("../../models/QuestionSkeleton.php");

$usersJson = '[
    {
        "fullName": "John Doe",
        "email": "john.doe@example.com",
        "password": "password123"
    },
    {
        "fullName": "Jane Smith",
        "email": "jane.smith@example.com",
        "password": "password456"
    },
    {
        "fullName": "Alice Johnson",
        "email": "alice.johnson@example.com",
        "password": "password789"
    },
    {
        "fullName": "Taylor Swift",
        "email": "taylor.swift@example.com",
        "password": "password22"
    }
]';

$users = json_decode($usersJson, true);

foreach ($users as $userData) {
    if (User::createUser($conn, $userData['fullName'], $userData['email'], $userData['password'])) {
        echo "User created successfully\n";
    } else {
        echo "Error creating user\n";
    }
}

$faqsJson = '[
    {
        "question": "What does SDLC stand for?",
        "answer": "SDLC stands for Software Development Life Cycle."
    },
    {
        "question": "What is the purpose of the SDLC?",
        "answer": "The SDLC covers all stages of software development, from inception with requirements definition through to deployment, maintenance, and eventual retirement."
    },
    {
        "question": "What are the three broad categories of software in SDLC?",
        "answer": "Category 1: Software providing back-end functionality (e.g., APIs). Category 2: Software providing service to end-users (e.g., business logic). Category 3: Software providing a visual interface to end-users (e.g., GUIs)."
    },
    {
        "question": "What are the three broad groups of SDLC models?",
        "answer": "Linear, Iterative, and Combination models."
    },
    {
        "question": "What is the difference between a model and a methodology in SDLC?",
        "answer": "A model describes what to do (descriptive), while a methodology describes how to do it (prescriptive)."
    },
    {
        "question": "Who first documented the waterfall model?",
        "answer": "The waterfall model was first documented by Benington in 1956."
    },
    {
        "question": "What modification did Winston Royce make to the waterfall model?",
        "answer": "Royce added a feedback loop to allow stages to overlap and be revisited."
    },
    {
        "question": "What are the stages in the original waterfall model?",
        "answer": "Operational Analysis, Requirements Specification, Design and Coding Specifications, Development, Testing, Deployment, and Evaluation."
    },
    {
        "question": "What is the main advantage of the waterfall model?",
        "answer": "It is efficient for creating software in Category 1 (e.g., relational databases, compilers)."
    },
    {
        "question": "What types of documents are required in the waterfall model?",
        "answer": "Requirements document, Preliminary design specification, Interface design specification, Final design specification, Test plan, and Operations manual."
    },
    {
        "question": "What is the b-model?",
        "answer": "The b-model is an extension of the waterfall model that includes a maintenance cycle for constant improvement."
    },
    {
        "question": "Why was the b-model created?",
        "answer": "To ensure constant improvement of the software and to capture an alternative to obsolescence."
    },
    {
        "question": "What type of software is the b-model suitable for?",
        "answer": "Category 1 software, similar to the waterfall model."
    },
    {
        "question": "What is the incremental model?",
        "answer": "The incremental model is a modification of the waterfall model that allows for iterative improvements."
    },
    {
        "question": "What are the main strengths of the incremental model?",
        "answer": "Feedback from earlier iterations can be incorporated. Stakeholders can be involved through iterations. Facilitates early, incremental releases. Enables risk mitigation by isolating and resolving issues early."
    },
    {
        "question": "How does the incremental model differ from the waterfall model?",
        "answer": "The incremental model allows for multiple iterations, while the waterfall model is linear."
    },
    {
        "question": "What is the v-model?",
        "answer": "The v-model is a variation of the waterfall model in a V shape, with the left leg representing requirements decomposition and the right leg representing integration and verification."
    },
    {
        "question": "What is the main strength of the v-model?",
        "answer": "It ensures verification and quality assurance procedures are defined at each stage, making it suitable for large projects."
    },
    {
        "question": "What is the vee+ model?",
        "answer": "The vee+ model adds user involvement, risks, and opportunities to the v-model."
    },
    {
        "question": "What is the spiral model?",
        "answer": "The spiral model is a risk-driven approach that introduces several iterations, starting small and spiraling out to address larger aspects of the project."
    },
    {
        "question": "What are the four quadrants of the spiral model?",
        "answer": "Determine objectives, Evaluate alternatives and identify risks, Develop and test, Plan the next iteration."
    },
    {
        "question": "What is the main benefit of the spiral model?",
        "answer": "It attempts to contain project risks and costs from the outset."
    },
    {
        "question": "What is the Mission Opportunity Model (MOM)?",
        "answer": "The MOM is a complementary model used in the spiral model to assess whether further development or effort should be expended."
    },
    {
        "question": "What is the wheel-and-spoke model?",
        "answer": "The wheel-and-spoke model is based on the spiral model and is designed to work with smaller teams initially, scaling up to build value faster."
    },
    {
        "question": "What is the Rational Unified Process (RUP)?",
        "answer": "RUP is an iterative and incremental software development framework that uses visual models and is driven by use cases."
    },
    {
        "question": "What are the four phases of RUP?",
        "answer": "Inception, Elaboration, Construction, and Transition."
    },
    {
        "question": "What are the seven best practices of RUP?",
        "answer": "Develop iteratively, Manage requirements, Employ component-based architecture, Use visual models, Verify quality continuously, Control changes, Use customization."
    },
    {
        "question": "What is Rapid Application Development (RAD)?",
        "answer": "RAD is a methodology that uses prototyping for iterative development, promoting collaboration between developers and stakeholders."
    },
    {
        "question": "What is Agile development?",
        "answer": "Agile development avoids scope changes and feature creep by breaking a project into smaller sub-projects, with development occurring in short intervals."
    },
    {
        "question": "What is Extreme Programming (XP)?",
        "answer": "XP involves incremental development without an initial design stage, relying on continuous feedback from users."
    },
    {
        "question": "What is Lean Development (LD)?",
        "answer": "Lean Development attempts to deliver a project early with minimal functionality, focusing on providing value quickly."
    },
    {
        "question": "What is Scrum?",
        "answer": "Scrum is an Agile framework that involves development over short iterations (sprints), with daily progress measurement."
    },
    {
        "question": "What is the future direction for SDLC models?",
        "answer": "Future SDLC models should draw from knowledge sharing between software development and systems design, and create a central repository for lessons learned."
    },
    {
        "question": "What is the main difficulty of the spiral model?",
        "answer": "It requires very adaptive project management and flexible contract mechanisms."
    },
    {
        "question": "What is the main challenge of using Agile in large projects?",
        "answer": "Agile emphasizes real-time communication, which can be difficult to maintain in large teams, and produces little documentation during development."
    },
    {
        "question": "What is the main goal of Lean Development?",
        "answer": "To deliver a project early with minimal functionality, focusing on providing value quickly."
    },
    {
        "question": "What is the main benefit of the vee+ model?",
        "answer": "It allows users to remain involved until the decompositions are of no interest to them, ensuring better alignment with user needs."
    },
    {
        "question": "What is the main strength of the incremental model?",
        "answer": "It facilitates early, incremental releases that evolve to a complete feature-set with each iteration."
    },
    {
        "question": "What is the main advantage of the waterfall model?",
        "answer": "It is efficient for creating software in Category 1 (e.g., relational databases, compilers)."
    },
    {
        "question": "What is the main purpose of the b-model?",
        "answer": "To ensure constant improvement of the software and to capture an alternative to obsolescence."
    },
    {
        "question": "What is the main focus of the spiral model?",
        "answer": "It focuses on risk-driven development, with each cycle addressing risks and iteratively improving the software."
    },
    {
        "question": "What is the main difference between the waterfall and spiral models?",
        "answer": "The waterfall model is linear and sequential, while the spiral model is iterative and risk-driven."
    },
    {
        "question": "What is the main challenge of using the v-model?",
        "answer": "It requires thorough decomposition and verification at each stage, which can be complex for very large projects."
    },
    {
        "question": "What is the main benefit of RUP?",
        "answer": "It provides a structured, iterative approach to software development, with a focus on risk management and continuous quality verification."
    },
    {
        "question": "What is the main difficulty of using RAD?",
        "answer": "It requires active participation from stakeholders, which can be challenging to manage."
    },
    {
        "question": "What is the main goal of Scrum?",
        "answer": "To deliver working software in short iterations (sprints), with daily progress measurement and continuous feedback."
    },
    {
        "question": "What is the main advantage of the incremental model over the waterfall model?",
        "answer": "It allows for early, incremental releases, enabling stakeholders to provide feedback and identify risks earlier in the process."
    }
]';

$questions = json_decode($faqsJson, true);
foreach ($questions as $questionData) {
    if (Question::createQuestion($conn, $questionData['question'], $questionData['answer'])) {
        echo "Question created successfully\n";
    } else {
        echo "Error creating question\n";
    }
}
