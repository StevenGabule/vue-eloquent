class Errors {
    constructor() {
        this.errors = {};
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        this.errors = errors.errors;
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }

    clear(field) {
       if(field) {
        delete this.errors[field];
        return;
       }
       this.errors = {};
    }
}

class Form {
    constructor(data) {
        this.originalData = data;
        for (let field in data) {
            this[field] = data[field];
        }
        this.errors = new Errors();
    }

    data() {
        let data = {};
        for (let property in this.originalData) {
            data[property] = this[property];
        }
        return data;
    }

    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }
        this.errors.clear();
    }


    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
            .then(response => {
                this.onSuccess(response.data);
                resolve(response.data);
            }).catch(error => {
                this.onFail(error.response.data);
                reject(error.response.data);
            });
        });
        
    }
    onSuccess(data) {
        alert(data.message);
        this.reset();
    }

    onFail(errors) {
        this.errors.record(errors);
    }
}

new Vue({
    el: '#app',
    
    data() {
        return {
            form: new Form({
                title: '',
                description: '',
            }),
        }
    },
    methods: {
        onSubmit() {
            this.form.submit('post', '/projects')
            .then(data => console.log(data))
            .catch(errors => console.log(errors));
        },
    }, 
})