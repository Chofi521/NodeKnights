extends CharacterBody2D

const SPEED = 200.0
const VERTICAL_SPEED = 200.0

func _physics_process(delta):
	
	var Horizontal_direction = Input.get_axis("ui_left", "ui_right")
	var vertical_direction = Input.get_axis("ui_up", "ui_down")
	
	Mover(Horizontal_direction, vertical_direction)
	
func Mover(Horizontal_direction, vertical_direction):
	if Horizontal_direction:
		velocity.x = Horizontal_direction * SPEED
		if Horizontal_direction > 0:
			$PlayerAnimation.play("Right")
		else:
			$PlayerAnimation.play("Left")
			
	elif vertical_direction:
		velocity.y = vertical_direction * VERTICAL_SPEED
		if vertical_direction < 0:
			$PlayerAnimation.play("Up")
		else:
			$PlayerAnimation.play("Down")
			
	else:
		velocity.x = move_toward(velocity.x, 0, SPEED)
		velocity.y = move_toward(velocity.y, 0, VERTICAL_SPEED)
	move_and_slide()

