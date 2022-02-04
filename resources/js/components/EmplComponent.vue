<template>
    <div class="container text-dark" >
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Employee: {{employees.length}}</div>

                    <div class="card-body">
                        Employee list:
                        <ul>
                            <li v-for="employee, i in employees" :key="i" class="m-3">
                                [{{i}}]{{employee.id}}  {{employee.first_name}}  {{employee.last_name}}
                                <a class="btn btn-danger" @click="deleteEmp(employee.id)">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {

                employees: [],
            };
        },
        methods:{
            deleteEmp(id) {
                console.log("id=" , id);
                axios.get(`/emp/delete/${id}`)  
                .then(res =>  {
                    const data = res.data;
                    console.log("data", data);
                    if(data){
                        const del = this.getidByElement(this.employees, id);
                        console.log("del", del);
                        this.employees.splice(del, 1);
                    }
                })
                .catch(err => {console.log(err);});                     
            },

            getidByElement(array,id){
                for(let i = 0;i<array.length;i++){
                    const elem = array[i];
                    if(elem.id == id){
                        console.log("i=" , i);
                        return i;
                    }
                    return -1;
                }
            } 
        },
        mounted() {
            axios.get('/emps/list')
            .then(res => {
                const data = res.data;

                this.employees = data;
                /* console.log(data); */
            }).catch(err => {
                console.error(err);
            });
        }
    }
</script>
