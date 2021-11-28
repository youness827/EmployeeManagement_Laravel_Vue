import EmployeesIndex from './components/Employees/Index';
import EmployeesCreate from './components/Employees/Create'
import EmployeesEdit from './components/Employees/Edit';
export const routes=[
    {
        path:'/employees',
        name:'EmployeesIndex',
        component:EmployeesIndex
    },
    {
        path:'/employees/create',
        name:'EmployeesCreate',
        component:EmployeesCreate
    },
    {
        path:'/employees/:id',
        name:'EmployeesEdit',
        component:EmployeesEdit
    },

];
