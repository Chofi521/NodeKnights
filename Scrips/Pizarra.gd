extends Node2D

@onready var interaction_area: InteractionArea = $InteractionArea

func _ready():
	interaction_area.interact = Callable(self, "_on_intreact")

func _on_intreact():
	DialogueManager.show_example_dialogue_balloon(load("res://Dialogos/Temas.dialogue"), "Start")
	return
