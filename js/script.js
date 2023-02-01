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
      const data = {
        addTask: this.newTask,
      }
      axios.post(this.pathGetData, data, {
        headers: { 'Content-Type': 'multipart/form-data' }
      }).then((response) => {
        this.newTask = '';
        this.todoList = response.data;
      })
    },
    deleteTask(task) {
      const data = {
        deleteTask: task,
      }
      axios.post(this.pathGetData, data, {
        headers: { 'Content-Type': 'multipart/form-data' }
      }).then((response) => {
        this.todoList = response.data;
      })
    }
  },
  mounted() {
    axios.get(this.pathGetData).then((response) => {
      this.todoList = response.data;
    });
  }
}).mount('#app');