extends Node2D

@onready var interaction_area: InteractionArea = $InteractionArea
@onready var sprite = $SoniaAnimation

func _ready():
	interaction_area.interact = Callable(self, "_on_intreact")

func _on_intreact():
	sprite.flip_h = true if interaction_area.get_overlapping_bodies()[0].global_position.x < global_position.x else false
	DialogueManager.show_example_dialogue_balloon(load("res://Dialogos/SoniaTest.dialogue"), "Start")
	return
