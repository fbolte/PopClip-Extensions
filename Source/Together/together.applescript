tell application "Together"
	
	make new note with data ("{popclip text}" as string) with properties {tag names:"popclip", comments:"Source: 
{popclip browser title} 
{popclip browser url}"}
end tell
