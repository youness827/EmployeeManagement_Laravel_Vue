<template>
<div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Employee</h1>
</div>
<div class="container mb-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div
              class="alert alert-success"
              v-if="message"
              >
              </div>
                <div class="card-header">Edit Employee
                        <div class="float-right">
                            <router-link
                            :to="{name:'EmployeesIndex'}"
                            class="btn btn-info fw-bold"
                            >
                            &larr; Back
                            </router-link>

                        </div>
                </div>

                <div class="card-body">
                    <form @submit.prevent="editEmp()">



                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" v-model="form.firstname" required />

                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" v-model="form.lastname" required />

                            </div>


                        </div>
                          <div class="form-group row">
                            <label for="middlename" class="col-md-4 col-form-label text-md-right">Mdlle Name</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control" name="middlename" v-model="form.middlename"  required />

                            </div>


                        </div>
                            <div class="form-group row">
                            <label for="adress" class="col-md-4 col-form-label text-md-right">Adress</label>

                            <div class="col-md-6">
                                <input id="adress" type="text" class="form-control" name="adress" v-model="form.adress" required />

                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="zipcode" class="col-md-4 col-form-label text-md-right">Zip Code</label>

                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control" name="zipcode" v-model="form.zipcode"  required />

                            </div>


                        </div>
                           <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Country's Name</label>

                            <div class="col-md-6">
                                <select
                                class="form-control"
                                name="country_id"
                                @change="getStates()"
                                v-model="form.country_id"
                                 >


                                    <option
                                      v-for="country in countries"
                                      :key="country.id"
                                      :value="country.id"
                                      >{{ country.name }}</option>
                                  </select>
                            </div>


                        </div>

                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">State's Name</label>

                            <div class="col-md-6">
                                <select
                                class="form-control"
                                name="state_id"
                                @change="getCities()"
                                v-model="form.state_id"
                                 >

                                    <option
                                      v-for="state in states"
                                      :key="state.id"
                                      :value="state.id"
                                      >{{ state.name }}</option>
                                  </select>

                            </div>


                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City's Name</label>

                            <div class="col-md-6">
                                <select
                                class="form-control"
                                name="city_id"
                                v-model="form.city_id"
                                >
                                    <option
                                    v-for="city in cities"
                                    :key="city.id"
                                    :value="city.id"
                                    >{{ city.name }}</option>
                                  </select>
                            </div>


                        </div>
                            <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">Department's Name</label>

                            <div class="col-md-6">
                                <select
                                  class="form-control"
                                  name="departement_id"
                                  v-model="form.departement_id"
                                >
                                    <option
                                            v-for="department in departments"
                                            :key="department.id"
                                            :value="department.id"
                                            >{{department.name}}
                                    </option>
                                  </select>
                            </div>


                        </div>

                          <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">Birth Date</label>

                            <div class="col-md-6">
                               <datepicker input-class="form-control" name="birthdate" v-model="form.birthdate"></datepicker>

                            </div>


                        </div>
                               <div class="form-group row">
                            <label for="datehierd" class="col-md-4 col-form-label text-md-right">Hird Date</label>

                            <div class="col-md-6">
                               <datepicker input-class="form-control" name="datehierd" v-model="form.datehierd"></datepicker>

                            </div>


                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"
                                class="btn btn-primary"
                              >
                                    Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';

export default {
  components:{
    Datepicker
  },
  data(){
    return{
        countries:[],
        states:[],
        cities:[],
        departments:[],
        form:{
          firstname:'',
          lastname:'',
          middlename:'',
          adress:'',
          zipcode:'',
          country_id:'',
          state_id:'',
          city_id:'',
          departement_id:'',
          birthdate:'',
          datehierd:''
        },
        message:''
    }

  },
  created(){
  this.getCountries();
  this.getDepartments();
  this.getEmployee();
  },
  methods:{
    getEmployee(){
       axios.get("/api/employees/"+this.$route.params.id)
      .then(res => {

        this.form = res.data.data;
         this.getStates();
        this.getCities();
      })
      .catch(error => {
        console.log(error);
      });
    },
    getCountries(){

      axios.get("/api/employees/countries")
      .then(res => {
        this.countries = res.data;
      })
      .catch(error => {
        console.log(error);
      });
    },
    getDepartments(){
        axios.get("/api/employees/departements")
        .then(res => {
          this.departments = res.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getStates(){
      axios.get("/api/employees/"+this.form.country_id+"/states")
        .then(res => {
          this.states = res.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    getCities(){
      axios.get("/api/employees/"+this.form.state_id+"/cities")
      .then(res => {
        this.cities = res.data;
      })
      .catch(error => {
        console.log(error);
      })
    },
    editEmp(){
      axios.put("/api/employees/"+this.$route.params.id,{
        'firstname':this.form.firstname,
        'lastname':this.form.lastname,
        'middlename':this.form.middlename,
        'adress':this.form.adress,
        'zipcode':this.form.zipcode,
        'country_id':this.form.country_id,
        'state_id':this.form.state_id,
        'city_id':this.form.city_id,
        'departement_id':this.form.departement_id,
        'birthdate':moment(String(this.form.birthdate)).format('YYYYMMDD'),
        'datehierd':moment(String(this.form.datehierd)).format('YYYYMMDD')



      })
      .then(res => {
      this.form=[];
      this.$router.push({name:'EmployeesIndex'});

      })

    }


  }
}
</script>
<style scoped>

</style>