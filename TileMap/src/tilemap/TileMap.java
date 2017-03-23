/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tilemap;

import javax.swing.JFrame;

/**
 *
 * @author Reed
 */
public class TileMap extends JFrame implements Runnable {
    
    private boolean fini = false;
    private Thread game;
    
    private Afficheur af;
    
    public TileMap(String title){
        super(title);
        af = new Afficheur();
        add(af);
    }
    
    public void update(){
        
    }
    public void render(){
        af.render();
    }

    @Override
    public void run() {
        long last = System.nanoTime();
        long actuel = 0;
        long timer = System.currentTimeMillis();
        final double DELTA_OPTI = 1000000000/60;
        double delta=0;
        int frames = 0;
        
        while(!fini){
            actuel = System.nanoTime();
            delta+= (actuel - last)/DELTA_OPTI;
            last = actuel;
            while(delta >= 1){
                update();
                render();
                frames++;
                delta--;
            }
            
            while(System.currentTimeMillis() > timer+1000){
                timer+=1000;
                System.out.println(frames);
                frames=0;
            }
        }
    }
    
    public void start(){
        fini = false;
        game = new Thread(this);
        game.start();
    }
    
    public void stop(){
        fini = true;
        try{
            game.join();
        }catch(Exception e){}
    }
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        TileMap p = new TileMap("Timer Rider");
        p.setSize(800,600);
        p.setLocation(300, 150);
        p.setVisible(true);
        p.setDefaultCloseOperation(EXIT_ON_CLOSE);
        p.setResizable(false);
        p.start();
    }
}
