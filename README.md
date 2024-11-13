# Kanban Table Application

This is a simple Kanban table application built with TypeScript, HTML, and CSS. It allows users to manage tasks by dragging and dropping them between three columns: "To Do", "In Progress", and "Done".

## Features
- Add new tasks.
- Move tasks between columns via drag-and-drop.
- Responsive layout that works on both desktop and mobile.

## Requirements

To run the application locally without Docker, you need:
- Node.js (version 18 or later)
- npm (Node package manager)

## Running with Docker

To build and run the application using Docker, follow these steps:

### 1. Build the Docker image

First, build the Docker image by running the following command in the project root directory:

```bash
docker build -t kanban-app .
