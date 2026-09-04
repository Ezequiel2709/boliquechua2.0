import sys
from PIL import Image

def process_gif(input_path, output_path, speed_factor=2.0):
    img = Image.open(input_path)
    frames = []
    durations = []
    
    try:
        while True:
            # Copy frame
            frame = img.copy()
            # Convert to RGBA
            frame = frame.convert("RGBA")
            
            # Make black transparent
            datas = frame.getdata()
            new_data = []
            for item in datas:
                # change all black (also shades of black)
                if item[0] < 30 and item[1] < 30 and item[2] < 30:
                    new_data.append((255, 255, 255, 0))
                else:
                    new_data.append(item)
            frame.putdata(new_data)
            
            frames.append(frame)
            
            # Increase duration
            duration = img.info.get('duration', 100)
            if duration == 0: duration = 100
            durations.append(int(duration * speed_factor))
            
            img.seek(img.tell() + 1)
    except EOFError:
        pass
        
    frames[0].save(output_path, save_all=True, append_images=frames[1:], loop=0, duration=durations, transparency=0, disposal=2)

if __name__ == '__main__':
    process_gif(sys.argv[1], sys.argv[2])
