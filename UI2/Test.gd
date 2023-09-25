extends CanvasLayer

const CHAR_READ_RATE = 0.05

@onready var textbox_container = $TextBoxContainer
@onready var start_symbol = $TextBoxContainer/MarginContainer/HBoxContainer/Star
@onready var end_symbol = $TextBoxContainer/MarginContainer/HBoxContainer/End
@onready var label = $TextBoxContainer/MarginContainer/HBoxContainer/Label



func _ready():
	hide_textbox()
	add_text("Texto que se añadira")

func hide_textbox():
	start_symbol.text = ""
	end_symbol.text = ""
	label.text = ""
	textbox_container.hide()

func show_textbox():
	start_symbol.text = "*"
	textbox_container.show()

func add_text(next_text):
	var tween = create_tween() 
	label.text = next_text
	show_textbox()
	tween.interpolate_value(label, "visible_ratio", 0.0, len(next_text) * CHAR_READ_RATE, Tween.TRANS_LINEAR, Tween.EASE_IN_OUT)
	tween.play()
