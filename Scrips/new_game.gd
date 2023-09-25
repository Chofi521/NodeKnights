extends Control


# Called when the node enters the scene tree for the first time.
func _ready():
	$ObjetoAlmacenador/Protagonist.play("Spin")
	pass # Replace with function body.


# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta):
	pass


func _on_iniciar_pressed():
	var name = $ObjetoAlmacenador2/TxtName.text
	var FavThing = $ObjetoAlmacenador2/TxtFavThing.text
	
	get_tree().change_scene_to_file("res://UI/Interfaz.tscn")


func _on_regresar_pressed():
			get_tree().change_scene_to_file("res://Escenas/opcionesTitulo.tscn")
