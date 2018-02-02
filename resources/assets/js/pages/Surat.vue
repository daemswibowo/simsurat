<template>
	<div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel">
						<div class="panel-heading">
							<div class="pull-right">
								<a href="javascript:void(0);" @click="create" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
							</div>
							<h3 class="panel-title">
								Surat {{ type }}
							</h3>
						</div>
						<div class="panel-body">
							dimas wibowo
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">{{ action }}</h4>
					</div>
					<div class="modal-body">
						<form action="javascript:void(0)">
							<div class="form-group">
								<label for="" class="control-label">No. Surat</label>
								<input type="text" v-model="form.no_surat" id="" class="form-control">
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</div>
</template>

<style>
	.panel-title, .modal-title {
		text-transform: capitalize;
	}
</style>

<script>
	export default {
		props: ['type'],
		data () {
			return {
				action: 'tambah',
				form: {
					no_surat: '',
					no_agenda: '',
					jenis_surat_id: '',
					tanggal_kirim: '',
					tanggal_terima: '',
					pengirim: '',
					perihal: '',
					tipe: ''
				}
			}
		},

		mounted () {
			this.form.tipe = this.type;
		},

		methods: {
			create () {
				this.action = 'tambah';
				$('#modal').modal('show');
			},
		}
	}
</script>