<script>
	export default {
    props  : ['old_vehicle_make_id','old_vehicle_model_id'],
		data() {
			return {
				vehicle_models : [],
        vehicle_make_id : this.old_vehicle_make_id ? this.old_vehicle_make_id : '',
        vehicle_model_id : this.old_vehicle_model_id ? this.old_vehicle_model_id : ''
			}
		},
    computed: {
      vehicleModels() {
          return this.vehicle_models;
      }
    },
    created() {
      if(this.old_vehicle_make_id) {
        this.getVehicleModels(this.old_vehicle_make_id);
      }
    },
		methods: {
			fetchVehicleModels(e) {
				let vehicleMakeId = e.target.value;
        this.getVehicleModels(vehicleMakeId);
			},
      getVehicleModels(vehicleMakeId) {
        axios.get(`/${vehicleMakeId}/VehicleModels`)
        .then(response => {
          this.vehicle_models = response.data.models;
        })
        .catch(error => {
        //...
        });
      }
		}
	}
</script>