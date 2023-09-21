extends Sprite2D


# Called when the node enters the scene tree for the first time.
func _ready():
	$Player.move_to_front()
	$ProfesoraSonia.move_to_front()

# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta):
	pass
