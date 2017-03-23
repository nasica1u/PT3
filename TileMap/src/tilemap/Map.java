/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tilemap;

/**
 *
 * @author chris_000
 */
public class Map {
    
    private int[][] map;
    private int l,h;
    
    public Map(int l, int h){
        map = new int[l][h];
        this.l=l;
        this.h=h;
    }
    
    public int getLargeur(){
        return l;
    }
    
    public int getHauteur(){
        return h;
    }
    
    public void fillMap(){
        map[5][10]=1;
        map[10][5]=1;
    }
    
    public int[][] getMap(){
        return map;
    }
    
    public int pixelsToTile(int pixels){
        int tile=0;
        tile = pixels/50;
        return tile;
    }
    
    public int tileToPixels(int tile){
        int pixels=0;
        pixels = tile*50;
        return pixels;
    }
}
