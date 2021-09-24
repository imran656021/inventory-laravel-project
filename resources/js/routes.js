let login = require('./components/login').default;
let register = require('./components/register').default;
let index = require('./components/index').default;

let allEmployee = require('./components/employee/allEmployee').default;
let addEmployee = require('./components/employee/addEmployee').default;
let editeEmployee = require('./components/employee/editeEmployee').default;
let showEmployee = require('./components/employee/showEmployee').default;

//supplier components are goes there
let suppliers = require('./components/supplier/index').default;
let addSupplier = require('./components/supplier/create').default;
let showSuppier = require('./components/supplier/show').default;
let editeSupplier = require('./components/supplier/edit').default;
//category
let category = require('./components/category/index').default;
let addCategory = require('./components/category/create').default;
let showCategory = require('./components/category/show').default;
let editeCategory = require('./components/category/edit').default;

//product
let product = require('./components/product/index').default;
let addProduct = require('./components/product/create').default;
let showProduct = require('./components/product/show').default;
let editeProduct = require('./components/product/edit').default;


export const routes = [
    { path: '/', component: index, name: '/' },
    { path: '/register', component: register, name: '/register' },
    { path: '/login', component: login, name: '/login' },
    { path: '/allEmployee', component: allEmployee, name: '/allEmployee' },
    { path: '/addEmployee', component: addEmployee, name: '/addEmployee' },
    { path: '/editeEmployee/:id', component: editeEmployee, name: '/editeEmployee' },
    { path: '/showEmployee/:id', component: showEmployee, name: '/showEmployee' },
    // suppliers routes are goes there
    { path: '/suppliers', component: suppliers, name: '/suppliers' },
    { path: '/addSupplier', component: addSupplier, name: '/addSupplier' },
    { path: '/showSuppier/:id', component: showSuppier, name: '/showSuppier' },
    { path: '/editeSupplier/:id', component: editeSupplier, name: '/editeSupplier' },
    //category
    { path: '/category', component: category, name: '/category' },
    { path: '/addCategory', component: addCategory, name: '/addCategory' },
    { path: '/showCategory/:id', component: showCategory, name: '/showCategory' },
    { path: '/editeCategory/:id', component: editeCategory, name: '/editeCategory' },

    //product
    { path: '/product', component: product, name: '/product' },
    { path: '/addProduct', component: addProduct, name: '/addProduct' },
    { path: '/showProduct', component: showProduct, name: '/showProduct' },
    { path: '/editeProduct', component: editeProduct, name: '/editeProduct' },
]