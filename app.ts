interface Task {
    id: number;
    content: string;
  }
  
  class Kanban {
    private todoList: Task[] = [];
    private inProgressList: Task[] = [];
    private doneList: Task[] = [];
  
    constructor() {
      this.initializeBoard();
    }
  
    private initializeBoard() {
      const addTaskButton = document.getElementById('add-task-btn') as HTMLButtonElement;
      addTaskButton.addEventListener('click', () => this.addTask());
  
      this.renderList('todo', this.todoList);
      this.renderList('inprogress', this.inProgressList);
      this.renderList('done', this.doneList);
    }
  
    private renderList(column: string, list: Task[]) {
      const listElement = document.getElementById(`${column}-list`) as HTMLUListElement;
      listElement.innerHTML = '';
  
      list.forEach(task => {
        const taskElement = document.createElement('li');
        taskElement.textContent = task.content;
        taskElement.setAttribute('draggable', 'true');
        taskElement.setAttribute('data-id', task.id.toString());
        taskElement.addEventListener('dragstart', this.handleDragStart);
        taskElement.addEventListener('dragover', this.handleDragOver);
        taskElement.addEventListener('drop', (e) => this.handleDrop(e, column));
        listElement.appendChild(taskElement);
      });
    }
  
    private addTask() {
      const taskContent = prompt('Enter the task content:');
      if (taskContent) {
        const newTask: Task = {
          id: Date.now(),
          content: taskContent,
        };
        this.todoList.push(newTask);
        this.renderList('todo', this.todoList);
      }
    }
  
    private handleDragStart(e: DragEvent) {
      const taskId = (e.target as HTMLElement).getAttribute('data-id');
      if (taskId) {
        (e.target as HTMLElement).setAttribute('data-dragging', taskId);
      }
    }
  
    private handleDragOver(e: DragEvent) {
      e.preventDefault();
      const target = e.target as HTMLElement;
      target.classList.add('drag-over');
    }
  
    private handleDrop(e: DragEvent, column: string) {
      e.preventDefault();
      const target = e.target as HTMLElement;
      target.classList.remove('drag-over');
  
      const taskId = target.getAttribute('data-id');
      if (taskId) {
        this.moveTask(taskId, column);
      }
    }
  
    private moveTask(taskId: string, targetColumn: string) {
      const taskIdNumber = parseInt(taskId, 10);
      let sourceList: Task[] = [];
      let targetList: Task[] = [];
  
      if (this.todoList.some(task => task.id === taskIdNumber)) {
        sourceList = this.todoList;
      } else if (this.inProgressList.some(task => task.id === taskIdNumber)) {
        sourceList = this.inProgressList;
      } else if (this.doneList.some(task => task.id === taskIdNumber)) {
        sourceList = this.doneList;
      }
  
      // Remove task from source list
      const taskIndex = sourceList.findIndex(task => task.id === taskIdNumber);
      const [task] = sourceList.splice(taskIndex, 1);
  
      // Add task to target list
      if (targetColumn === 'todo') {
        targetList = this.todoList;
      } else if (targetColumn === 'inprogress') {
        targetList = this.inProgressList;
      } else if (targetColumn === 'done') {
        targetList = this.doneList;
      }
  
      targetList.push(task);
      this.renderList('todo', this.todoList);
      this.renderList('inprogress', this.inProgressList);
      this.renderList('done', this.doneList);
    }
  }
  
  new Kanban();
  