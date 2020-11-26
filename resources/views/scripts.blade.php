<script>
    new Vue({
        computed: {
            filteredRoutes() {
                return this.routes.filter(route => {
                    return this.allowDeprecated(route)
                        && this.allowTypes(route)
                        && this.allow(route, 'domain')
                        && this.allow(route, 'module');
                });
            },

            filteredHeaders() {
                return this.headers.filter(item => {
                    switch (item.value) {
                        case 'domain':
                            return this.hasHeader('domain');
                        case 'module':
                            return this.hasHeader('module');
                        default:
                            return true;
                    }
                });
            },


            hasModules() {
                return this.hasRoute('module');
            },

            hasDomains() {
                return this.hasRoute('domain');
            },

            sortedDomains: {
                get: function () {
                    return this.filter.domain;
                },

                set: function (items) {
                    this.filter.domain = this.sortFilter('domain', items);
                }
            },

            sortedModules: {
                get: function () {
                    return this.filter.module;
                },

                set: function (items) {
                    this.filter.module = this.sortFilter('module', items);
                }
            },

            sortedDeprecated: {
                get: function () {
                    return this.filter.deprecated;
                },

                set: function (items) {
                    this.filter.deprecated = this.sortFilter('deprecated', items);
                }
            },

            sortedTypes: {
                get: function () {
                    return this.filter.types;
                },

                set: function (value) {
                    this.filter.types = value;
                }
            }
        },

        mounted() {
            this.getRoutes();
        },

        methods: {
            //getRoutes() {
            //    axios.get(this.url)
            //        .then(response => {
            //            this.routes = response.data;
            //
            //            this.setDomains();
            //            this.setModules();
            //        })
            //        .catch(error => console.error(error))
            //        .finally(() => this.loading = false);
            //},

            getRoutesKey(key) {
                let result = [...this.items.base];

                _.each(this.routes, route => {
                    let name = route[key];

                    if (name !== null && ! this.inArray(result, name, 'key')) {
                        result.push({ key: name, value: name });
                    }
                });

                return _.map(result, (item, index) => {
                    if (item.color !== undefined) {
                        return item;
                    }

                    let color = this.getColor(index);

                    _.set(item, 'color', color);

                    return item;
                });
            },

            getColor(index) {
                return this.colors[index] === undefined
                    ? this.colors[0]
                    : this.colors[index];
            },

            setDomains() {
                this.items.domains = this.getRoutesKey('domain');
            },

            setModules() {
                this.items.modules = this.getRoutesKey('module');
            },

            setFilter(key, value) {
                if (key === 'value') {
                    this.filter.value = value;
                } else {
                    if (! this.inArray(this.filter[key], value)) {
                        this.pushFilter(key, value);
                    }
                }
            },

            unselectFilter(key, value) {
                this.filter[key] = _.filter(this.filter[key], val => val.toLowerCase() !== value.toLowerCase());
            },

            allowDeprecated(route) {
                let values = this.filter.deprecated;

                if (this.isEmptyValue(values)) {
                    return true;
                }

                let only = this.inArray(values, 'only') ? route.deprecated === true : false;
                let without = this.inArray(values, 'without') ? route.deprecated === false : false;

                return only || without;
            },

            allowTypes(route) {
                switch (this.filter.types) {
                    case 'api':
                        return route.is_api === true;
                    case 'web':
                        return route.is_web === true;
                    default:
                        return true;
                }
            },

            allow(route, key) {
                let filters = this.filter[key];
                let value = route[key];

                let all = this.isEmptyValue(filters);
                let without = this.inArray(filters, 'without') ? value === null : false;
                let search = this.inArray(filters, value);

                return all || without || search;
            },


            sortFilter(key, items) {
                return this.filter[key] = items.sort();
            },

            hasHeader(key) {
                return this.has(this.filteredRoutes, key);
            },

            hasRoute(key) {
                return this.has(this.routes, key);
            },

            has(items, key) {
                return _.filter(items, item => item[key] !== null).length > 0;
            },

            inArray(array, value, key = null) {
                return _.filter(array, (val, index) => {
                    if (key !== null) {
                        if (index === key && val === value)
                            return true;
                    } else {
                        if (val === value)
                            return true;
                    }

                    return false;
                }).length > 0;
            },

            pushFilter(key, value) {
                this.isEmptyValue(this.filter[key])
                    ? this.filter[key] = [value]
                    : this.filter[key].push(value);
            }
        }
    });
</script>
