const { createApp } = Vue;

createApp({
  data() {
    return {
      todoList: [],
      newTask: '',
      pathGetData: './server/getData.php',
    }
  },
  methods: {
    addTask() {
      const params = {
        addTask: this.newTask.trim(),
      }
      axios.post(this.pathGetData, params, {
        headers: { 'Content-Type': 'multipart/form-data' }
      }).then((response) => {
        this.newTask = '';
        this.todoList = [];
        response.data.forEach(element => {
          this.todoList.push({
            "task": element.task,
            "done": element.done,
            "edit": false,
            "editString": element.task
          });
        });
      })
    },
    setEdit(index) {
      this.todoList[index].edit = !this.todoList[index].edit;
      if (this.todoList[index].task != this.todoList[index].editString.trim()) {
        const params = {
          editTask: index,
          editString: this.todoList[index].editString
        }
        axios.post(this.pathGetData, params, {
          headers: { 'Content-Type': 'multipart/form-data' }
        }).then((response) => {
          this.todoList = [];
          response.data.forEach(element => {
            this.todoList.push({
              "task": element.task,
              "done": element.done,
              "edit": false,
              "editString": element.task
            });
          });
        })
      }
    },
    setDone(index) {
      const params = {
        setDone: index,
      }
      axios.post(this.pathGetData, params, {
        headers: { 'Content-Type': 'multipart/form-data' }
      }).then((response) => {
        this.todoList = [];
        response.data.forEach(element => {
          this.todoList.push({
            "task": element.task,
            "done": element.done,
            "edit": false,
            "editString": element.task
          });
        });
      })
    },
    deleteTask(index) {
      const params = {
        deleteTask: index,
      }
      axios.post(this.pathGetData, params, {
        headers: { 'Content-Type': 'multipart/form-data' }
      }).then((response) => {
        this.todoList = [];
        response.data.forEach(element => {
          this.todoList.push({
            "task": element.task,
            "done": element.done,
            "edit": false,
            "editString": element.task
          });
        });
      })
    }
  },
  mounted() {
    axios.get(this.pathGetData).then((response) => {
      response.data.forEach(element => {
        this.todoList.push({
          "task": element.task,
          "done": element.done,
          "edit": false,
          "editString": element.task
        })
      });
    });
  }
}).mount('#app');