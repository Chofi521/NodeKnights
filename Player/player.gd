extends CharacterBody2D

const SPEED = 200.0

enum PlayerAnimation {
	Up,
	Down,
	Left,
	Right,
	Idle_Up,
	Idle_Down,
	Idle_Left,
	Idle_Right
}

var Animacion_Actual = PlayerAnimation.Idle_Up
@onready var Animation_player = $PlayerAnimation

func _physics_process(delta):
	var Horizontal_direction = Input.get_axis("ui_left", "ui_right")
	var vertical_direction = Input.get_axis("ui_up", "ui_down")
	
	if Horizontal_direction:
		velocity.x = Horizontal_direction * SPEED
		if Horizontal_direction > 0:
			Animacion_Actual = PlayerAnimation.Right
		else:
			Animacion_Actual = PlayerAnimation.Left
			
	elif vertical_direction:
		velocity.y = vertical_direction * SPEED
		if vertical_direction < 0:
			Animacion_Actual = PlayerAnimation.Up
		else:
			Animacion_Actual = PlayerAnimation.Down
			
	else:
		velocity.x = move_toward(velocity.x, 0, SPEED)
		velocity.y = move_toward(velocity.y, 0, SPEED)
		
		match Animacion_Actual:
			PlayerAnimation.Up:
				Animacion_Actual = PlayerAnimation.Idle_Up
			PlayerAnimation.Down:
				Animacion_Actual = PlayerAnimation.Idle_Down
			PlayerAnimation.Left:
				Animacion_Actual = PlayerAnimation.Idle_Left
			PlayerAnimation.Right:
				Animacion_Actual = PlayerAnimation.Idle_Right
	
	move_and_slide()
	Animaciones()

func Animaciones():
	match Animacion_Actual:
		PlayerAnimation.Up:
			Animation_player.play("Up")
			
		PlayerAnimation.Down:
			Animation_player.play("Down")
			
		PlayerAnimation.Left:
			Animation_player.play("Left")
			
		PlayerAnimation.Right:
			Animation_player.play("Right")
			
		PlayerAnimation.Idle_Up:
			Animation_player.play("Idle_Up")
			
		PlayerAnimation.Idle_Down:
			Animation_player.play("Idle_Down")
			
		PlayerAnimation.Idle_Left:
			Animation_player.play("Idle_Left")
			
		PlayerAnimation.Idle_Right:
			Animation_player.play("Idle_Right")
