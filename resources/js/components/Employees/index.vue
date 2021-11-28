<template>
  <div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Departements</h1>
</div>
    <div class="row">
    <div class="card mx-auto">
      <div class="card-header">
        <div v-if="showmessgae">
          <div class="alert alert-success">
            {{ message }}
          </div>
        </div>

    <router-link
    :to="{name:'EmployeesCreate'}"
    class="float-right btn btn-outline-primary"
    >Add New Employees</router-link>

       <form method="GET" action="">
        <div class="form-row align-items-center">
          <div class="col-auto">
            <input type="text" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="By Departement's Name ...">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Search</button>
          </div>
        </div>
      </form>

      </div>
    <div class="card-body">
    <table class="table table-responsive">
            <thead>
            <tr>

               <th scope="col">lastname</th>
               <th scope="col">firstname</th>
               <th scope="col">middlename</th>
               <th scope="col">adress</th>
               <th scope="col">zipcode</th>
               <th scope="col">birthdate</th>
                <th scope="col">datehierd</th>
               <th scope="col">departement</th>
                <th scope="col">city</th>
               <th scope="col">state</th>
               <th scope="col">country</th>

               <th scope="col" class="text-red">Operations</th>
              </tr>
            </thead>
            <tbody>


            <tr
                v-for="employee in employees"
                :key="employee.id"
              >


               <td>{{employee.lastname}} </td>
                <td>{{employee.firstname}} </td>
               <td>{{employee.middlename}} </td>
               <td>{{employee.adress}} </td>
               <td>{{employee.zipcode}} </td>
               <td>{{dateformat(employee.birthdate)}} </td>
                 <td>{{dateformat(employee.datehierd)}} </td>
               <td>
                  {{employee.departement.name}}
                  </td>
               <td>{{employee.city.name}} </td>
               <td>{{employee.state.name}} </td>
               <td>{{employee.country.name}} </td>


               <td>
                <div class="container px-4">
                  <div class="row gx-5">
                    <div class="col">
                     <div class="p-1">

                       <router-link
                       :to="{name:'EmployeesEdit',
                       params: {id: employee.id}
                       }"
                       class="btn btn-primary"
                       >Edit</router-link>

                     </div>
                    </div>
                    <div class="col">
                      <div class="p-1">
                        <button
                        class="btn btn-danger"
                        @click="deleteEmployee(employee.id)"
                        > Delete</button>
                        </div>
                    </div>
                  </div>
                </div>



              </td>
            </tr>

            </tbody>
        </table>
</div>
  </div>
    </div>


  </div>

</template>

<script>

import moment from 'moment';

export default {
      data() {
        return {
          employees:[],
          showmessgae:false,
          message:''


        }
      },
      created(){
        this.getAllEmployees();

      },
      methods: {
        getAllEmployees(){
          axios.get("/api/employees")
          .then(res => {
            this.employees=res.data.data;
            console.log(res.data.data);
          })
          .catch(error => {
            console.log(error);
          })
        },
        deleteEmployee($id){
          axios.delete("/api/employees/"+$id)
          .then(res => {
            this.getAllEmployees();
            this.showmessgae=true;
            this.message=res.data;


          })
        },
        dateformat(value){
          if (value) {
          return moment(String(value)).format('DD-MM-YYYY');
          }
        }
      },

};
</script>

<style scoped>
</style>

