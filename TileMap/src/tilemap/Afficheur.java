/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tilemap;

import java.awt.Color;
import java.awt.Graphics;
import javax.swing.JPanel;

/**
 *
 * @author Reed
 */
public class Afficheur extends JPanel{
    private Map map;
    
    public Afficheur(){
        map = new Map(800,600);
        map.fillMap();
    }
    
    public void render(){
        repaint();
    }
    
    @Override
    public void paintComponent(Graphics g){
        super.paintComponent(g);
        setBackground(Color.yellow);
        g.setColor(Color.black);
        for(int i=0; i<map.getLargeur(); i++){
            for(int j=0; j<map.getHauteur(); j++){
                if(map.getMap()[i][j]==1){
                    g.fillRect(map.tileToPixels(i), map.tileToPixels(i), 50, 50);
                }
            }
        }
    }
}
