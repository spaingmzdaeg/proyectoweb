

var url = "./includes/crudvuejersey.php";

new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  data: () => ({ 
    notifications: [
        { id: 1, title: 'Click Me' },
        { id: 2, title: 'Click Me' },
        { id: 3, title: 'Click Me' },
        { id: 4, title: 'Click Me 2' }
      ],
    search: '', //para el cuadro de búsqueda de datatables  
    snackbar: false, //para el mensaje del snackbar   
    textSnack: 'texto snackbar', //texto que se ve en el snackbar 
    dialog: false, //para que la ventana de dialogo o modal no aparezca automáticamente      
    //definimos los headers de la datatables
      
    headers: [
      {
          
        text: 'ID',
        align: 'left',
        sortable: false,
        value: 'id',
      },
      { text: 'TEAM', value:'team'},
      { text: 'PLAYER', value:'player'},
      { text: 'STOCK', value: 'stock'},
      { text: 'ACCIONES', value: 'accion', sortable: false },
    ],
    jerseys: [], //definimos el array moviles
    editedIndex: -1,
    editado: {
      id: '',
      team: '',
      player: '',
      stock: '',
    },
    defaultItem: {
      id: '',
      team: '',
      player: '',
      stock: '',
    },
  }),

  computed: {
    //Dependiendo si es Alta o Edición cambia el título del modal  
    formTitle () {
      //operadores condicionales "condición ? expr1 : expr2"
      // si <condicion> es true, devuelve <expr1>, de lo contrario devuelve <expr2>    
      return this.editedIndex === -1 ? 'Nuevo Registro' : 'Editar Registro'
    },
  },

  watch: {
    dialog (val) {
      val || this.cancelar()
    },
  },

  created () {
      this.listarJerseys()
  },

  methods: {      
     //PROCEDIMIENTOS para el CRUD  
    //Procedimiento Listar moviles  
    listarJerseys:function(){
        axios.post(url, {opcion:4}).then(response =>{
           this.jerseys = response.data;       
        });
    },          
    //Procedimiento Alta de moviles.
    altaMovil:function(){
        axios.post(url, {opcion:1, team:this.team, player:this.player,stock:this.stock }).then(response =>{
            this.listarJerseys();
        });        
         this.team = "",
         this.player = "",
         this.stock = 0
    },  
    //Procedimiento EDITAR.
    editarJersey:function(id,team,player,stock){       
       axios.post(url, {opcion:2, id:id, team:team, player: player, stock:stock }).then(response =>{
          this.listarJerseys();           
        });                              
    },    
    //Procedimiento BORRAR.
    borrarJersey:function(id){
        axios.post(url, {opcion:3, id:id}).then(response =>{           
            this.listarJerseys();
            });
    },             
    editar (item) {    
      this.editedIndex = this.jerseys.indexOf(item)
      this.editado = Object.assign({}, item)
      this.dialog = true
    },
    borrar (item) { 
      const index = this.jerseys.indexOf(item)
      
      console.log(this.jerseys[index].id) //capturo el id de la fila seleccionada 
        var r = confirm("¿Está seguro de borrar el registro?");
        if (r == true) {
        this.borrarJersey(this.jerseys[index].id)    
        this.snackbar = true
        this.textSnack = 'Se eliminó el registro.'    
        } else {
        this.snackbar = true
        this.textSnack = 'Operación cancelada.'    
        }    
    },
    cancelar () {
      this.dialog = false
      this.editado = Object.assign({}, this.defaultItem)
      this.editedIndex = -1
    },
    guardar () {
      if (this.editedIndex > -1) {
          //Guarda en caso de Edición
        this.id=this.editado.id          
        this.team=this.editado.team
        this.player=this.editado.player
        this.stock=this.editado.stock
        this.snackbar = true
        this.textSnack = '¡Actualización Exitosa!'  
        this.editarJersey(this.id,this.team, this.player, this.stock)  
      } else {
          //Guarda el registro en caso de Alta  
          if(this.editado.team == "" || this.editado.player == "" || this.editado.stock == 0){
          this.snackbar = true
          this.textSnack = 'Datos incompletos.'      
        }else{
          this.team=this.editado.team
          this.player=this.editado.player
          this.stock=this.editado.stock          
          this.snackbar = true
          this.textSnack = '¡Alta exitosa!'
          this.altaMovil()
        }       
      }
      this.cancelar()
    },
  },
});