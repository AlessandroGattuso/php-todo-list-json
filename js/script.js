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
        addTask: this.newTask,
      }
      axios.post(this.pathGetData, params, {
        headers: { 'Content-Type': 'multipart/form-data' }
      }).then((response) => {
        this.newTask = '';
        this.todoList = response.data;
      })
    },
    setDone(index) {
      const params = {
        setDone: index,
      }
      axios.post(this.pathGetData, params, {
        headers: { 'Content-Type': 'multipart/form-data' }
      }).then((response) => {
        this.todoList = response.data;
      })
    },
    deleteTask(index) {
      const params = {
        deleteTask: index,
      }
      axios.post(this.pathGetData, params, {
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